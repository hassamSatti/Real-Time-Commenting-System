<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Artical;
use App\Models\Comment;

class CommentSection extends Component
{
    public $article;
    public $comment;

    public function mount(Artical $article)
    {
        $this->article = $article;
    }

    public function render()
    { 
        $comments = Comment::where('artical_id', $this->article->id)
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->orderBy('comments.created_at', 'desc')
        ->get(); 
        return view('livewire.comment-section', [
            'comments' => $comments
        ]);
    }

    public function addComment()
    {
        Comment::create([
            'artical_id' => $this->article->id,
            'user_id' => auth()->user()->id,
            'comment' => $this->comment
        ]);

        $this->comment = '';

        // Optionally, you can dispatch an event or perform any additional actions here

        $this->emit('commentAdded');
    }
}