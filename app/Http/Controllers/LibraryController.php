<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Models\BooksModel;
use App\Models\PublishingModel;
use App\Models\UserModel;

class LibraryController extends Controller
{
    public function __construct(BooksModel $booksModel, PublishingModel $publishingModel, UserModel $userModel)
    {
        $this->BooksModel = $booksModel;
        $this->PublishingModel = $publishingModel;
        $this->UserModel = $userModel;
    }
    public function index()
    {
        return view('index');
    }

    public function create(Request $request)
    {
        $userId = $request->UserId;
        $user = $this->UserModel
            ->where('id', '=', $userId)
            ->first();

        $publishing = $this->PublishingModel->get();

        return view('create', ['User'=>$user, 'Publishing'=>$publishing]);
    }

    public function store(StoreRequest $request)
    {
        $bookName = $request->bookName;
        $userId = $request->userId;
        $publishing = $request->publishing;
        
        $this->BooksModel->insert([
            'Name' => $bookName,
            'UserId' => $userId,
            'Publishing' => $publishing
        ]);
    }
}
