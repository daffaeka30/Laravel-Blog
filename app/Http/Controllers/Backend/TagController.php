<?php

namespace App\Http\Controllers\Backend;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Services\Backend\TagService;

class TagController extends Controller
{
    public function __construct(private TagService $tagService)
    {
        $this->middleware('owner');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('backend.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request): JsonResponse
    {
        $data = $request->validated();

        try {

            $this->tagService->create($data);

            return response()->json([
                'message' => 'Data created successfully',
            ]);
        } catch (\Exception $err) {
            return response()->json(['message' => $err->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid): JsonResponse
    {
        return response()->json(['data' => $this->tagService->getFirstBy('uuid', $uuid)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, string $uuid): JsonResponse
    {
        $data = $request->validated();

        $getData = $this->tagService->getFirstBy('uuid', $uuid);

        try {
            $this->tagService->update($data, $getData->uuid);

            return response()->json([
                'message' => 'Data updated successfully',
            ]);
        } catch (\Exception $err) {
            return response()->json(['message' => $err->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid): JsonResponse
    {
        $getData = $this->tagService->getFirstBy('uuid', $uuid);

        $getData->delete();

        return response()->json([
            'message' => 'Data deleted successfully',
        ]);
    }

    public function serverside(Request $request): JsonResponse
    {
        return $this->tagService->dataTable($request);
    }
}
