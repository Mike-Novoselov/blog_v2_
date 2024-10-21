<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserGallery;
use Illuminate\Http\Request;

class UserGalleryController extends Controller
{
    // Отображение всех фотографий пользователя
    public function index($userId)
    {
        $user = User::findOrFail($userId);
        $galleries = $user->galleries; // Получаем все фотографии пользователя
        return view('galleries.index', compact('user', 'galleries'));
    }

    // Форма для добавления новой фотографии
    public function create($userId)
    {
        $user = User::findOrFail($userId);
        return view('galleries.create', compact('user'));
    }

    // Сохранение новой фотографии
    public function store(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        // Валидация данных
        $request->validate([
            'image_path' => 'required|string', // Путь к изображению
        ]);

        // Сохраняем новую фотографию в галерее пользователя
        $user->galleries()->create([
            'image_path' => $request->image_path,
        ]);

        return redirect()->route('galleries.index', $userId)->with('success', 'Image added successfully');
    }

    // Удаление фотографии
    public function destroy($userId, $id)
    {
        $gallery = UserGallery::where('user_id', $userId)->findOrFail($id);
        $gallery->delete();

        return redirect()->route('galleries.index', $userId)->with('success', 'Image deleted successfully');
    }
}
