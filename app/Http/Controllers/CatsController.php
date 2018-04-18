<?php

namespace App\Http\Controllers;
use App\Cat;
use App\News;
use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CatCreateRequest;
use App\Http\Requests\CatUpdateRequest;
use App\Repositories\CatRepository;
use App\Validators\CatValidator;

/**
 * Class CatsController.
 *
 * @package namespace App\Http\Controllers;
 */
class CatsController extends Controller
{
    /**
     * @var CatRepository
     */
    protected $repository;

    /**
     * @var CatValidator
     */
    protected $validator;

    /**
     * CatsController constructor.
     *
     * @param CatRepository $repository
     * @param CatValidator $validator
     */
    public function __construct(CatRepository $repository, CatValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
//        $cats = $this->repository->all();
//
//        if (request()->wantsJson()) {
//
//            return response()->json([
//                'data' => $cats,
//            ]);
//        }
//
        // return view('cats.index', compact('cats'));
        $cate = Cat::with('news')->orderBy('id','DESC')->get();
        return response()->json($cate,200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CatCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $cat = Cat::create($data);
        return response()->json([
            'data' => $cat,
            'message' => 'Save successfully !'
        ]);
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
        $cat = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $cat,
            ]);
        }

        return view('cats.show', compact('cat'));
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
//        $cat = $this->repository->find($id);
//        return view('cats.edit', compact('cat'));
        $cat = Cat::findOrFail($id);
        return response()->json($cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CatUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(Request $request, $id)
    {
        $cat = Cat::findOrFail($id);
        $data = $request->all();
        $cat->update($data);
        return response()->json($cat);
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
        $cat = Cat::findOrFail($id);
        $cat->delete();
        return response()->json($cat);
    }
}
