<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request; 
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Traits\ResponserTraits;


class PostController extends Controller
{
    use ResponserTraits;
    public function index(Request $request)
    {
        $limit = $request->input('limit', 10);
        $posts = Post::with('user', 'reactions')->paginate($limit)->withQueryString();
        return $this->responseSuccessWithPaginate('Success',PostResource::collection($posts));
    }


    public function likeUnlike(Request $request)
    {
        // Validate request parameters
        $request->validate([
            'post_id' => ['required', 'exists:posts,id'],
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Find the post by ID
        $post = Post::findOrFail($request->input('post_id'));

        // Check if the user has already liked the post
        $reaction = Reaction::where('post_id', $post->id)
            ->where('user_id', $user->id)
            ->first();

        if ($reaction) {
            // If a reaction exists, remove it (unlike)
            $reaction->delete();
            return response()->json([
                'message' => 'Post unliked successfully.',
                'liked' => false,
            ], Response::HTTP_OK);
        } else {
            // If no reaction exists, create one (like)
            Reaction::create([
                'post_id' => $post->id,
                'user_id' => $user->id,
            ]);
            return response()->json([
                'message' => 'Post liked successfully.',
                'liked' => true,
            ], Response::HTTP_OK);
        }
    }
}
