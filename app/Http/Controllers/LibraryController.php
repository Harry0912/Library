<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\SearchRequest;

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
        $data = $this->BooksModel
            ->with('users')
            ->with('publishing')
            ->orderBy('created_at', 'desc')
            ->Paginate(3);

        return view('index', ['data' => $data]);
    }

    public function show($id)
    {
        $data = $this->BooksModel
            ->with('users')
            ->with('publishing')
            ->where('Id', '=', $id)
            ->first();

        return view('show', ['data' => $data]);
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
        $content = $request->content;
        $userId = $request->userId;
        $publishing = $request->publishing;
        
        $this->BooksModel->insert([
            'Name' => $bookName,
            'Content' => $content,
            'UserId' => $userId,
            'Publishing' => $publishing
        ]);
    }

    public function edit($id)
    {
        $data = $this->BooksModel
            ->with('users')
            ->with('publishing')
            ->where('Id', '=', $id)
            ->first();

        return view('edit', ['data' => $data]);
    }

    public function update(UpdateRequest $request)
    {
        $id = $request->id;
        $content = $request->content;

        $data = $this->BooksModel
            ->where('Id', '=', $id)
            ->first();
        $data->Content = $content;
        $data->save();
    }

    public function search(SearchRequest $request)
    {
        $keyword = $request->keyword;
        $type = $request->type;

        switch ($type) {
            case 'book':
                $column = 'Name';
                break;
            case 'author':
                $column = 'UserId';
                $keyword = $this->UserModel
                    ->where('name', '=', $keyword)
                    ->first()->id;
                break;
            case 'publishing':
                $column = 'publishing';
                $keyword = $this->PublishingModel
                    ->where('Name', '=', $keyword)
                    ->first()->Id;
                break;
        }

        $data = $this->BooksModel
            ->with('users')
            ->with('publishing')
            ->where($column, 'like', '%'.$keyword.'%')
            ->orderBy('created_at', 'desc')
            ->Paginate(3);
            
        return view('index', ['data' => $data]);
    }
}
