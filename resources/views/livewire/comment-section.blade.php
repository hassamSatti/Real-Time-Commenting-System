<div>
    @foreach($comments as $comment)
    <div class="user-block">
        <img class="img-circle img-bordered-sm" src="{{asset('dummy.png')}}" alt="User Image">
        <span class="username">
            <a href="#">{{ $comment->name}}</a>
        </span>
        <span class="description">Sent you a message - 3 days ago</span>
    </div>
    <p>
        {{ $comment->comment}}
    </p>

    @endforeach

    <form wire:submit.prevent="addComment">
        
    <div class="input-group input-group-sm mb-0">
        <input type="text" class="form-control form-control-sm" wire:model="comment"  placeholder="Write a comment..."/>
        <div class="input-group-append">
            <button type="submit"  class="btn btn-success btn-danger">Submit</button>
        </div>
    </div>    
    </form>
</div>