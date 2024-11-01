<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Services\Backend\WriterService;
use App\Models\User;

class WriterController extends Controller
{
    public function __construct(private WriterService $writerService) {
        $this->middleware('owner');
    }

    public function index(): View
    {
        return view('backend.writers.index');
    }

    public function show(string $id): JsonResponse
    {
        return response()->json(['data' => $this->writerService->getFirstBy('id', $id)]);
    }

    public function destroy(string $id): JsonResponse
    {
        $getData = $this->writerService->getFirstBy('id', $id);

        $getData->delete();

        return response()->json([
            'message' => 'Data deleted successfully',
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $writer = User::where('id', $id)->firstOrFail();

            $writer->is_verified = !$writer->is_verified;

            if ($writer->is_verified) {
                $writer->email_verified_at = now();
            } else {
                $writer->email_verified_at = null;
            }
        
            $writer->save();
        
            return response()->json([
                'message' => 'Verification status updated successfully',
            ]);
        } catch (\Exception $err) {
            return response()->json(['message' => $err->getMessage()], 500);
        }
    }

    public function serverside(Request $request): JsonResponse
    {
        return $this->writerService->dataTable($request);
    }
}