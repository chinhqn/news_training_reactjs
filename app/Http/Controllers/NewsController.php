<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Repositories\NewsRepository;
use App\Validators\NewsValidator;

/**
 * Class NewsController.
 *
 * @package namespace App\Http\Controllers;
 */
class NewsController extends Controller
{
//    /**
//     * @var NewsRepository
//     */
//    protected $repository;
//
//    /**
//     * @var NewsValidator
//     */
//    protected $validator;
//
//    /**
//     * NewsController constructor.
//     *
//     * @param NewsRepository $repository
//     * @param NewsValidator $validator
//     */
//    public function __construct(NewsRepository $repository, NewsValidator $validator)
//    {
//        $this->repository = $repository;
//        $this->validator  = $validator;
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('cat')->get();
        return response()->json($news);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NewsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NewsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);
        $new->delete();
        return response()->json($new);
    }
}
