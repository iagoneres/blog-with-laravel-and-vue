<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Article;
use App\Repositories\ArticleRepository;
use App\Validators\ArticleValidator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ArticlesController extends Controller
{

    protected $repository;

    protected $validator;

    /**
     * ArticlesController constructor.
     * @param ArticleRepository $repository
     * @param ArticleValidator $validator
     */
    public function __construct(ArticleRepository $repository, ArticleValidator $validator)
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
        $breadcrumb = json_encode([
            ['title' => 'Home', 'url' => route('home')],
            ['title' => 'Artigos', 'url' => ""],
        ]);

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $articles = Article::paginate(5);

        if (request()->wantsJson()) {
            return response()->json([
                'data' => $articles,
            ]);
        }

        return view('admin.articles.index', compact('breadcrumb', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $user =  Auth::user();
            $data = $request->all();
            $data['user_id'] = $user->id;

            $article = $this->repository->create($data);

            $response = [
                'message' => 'Artigo criado.',
                'data'    => $article,
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @throws ValidatorException
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $article = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Artigo atualizado.',
                'data'    => $article,
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Artigo removido.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Artigo removido.');
    }
}
