<?php 
function getTimeAgo($datetime) {
    $currentDateTime = new DateTime();
    $providedDateTime = new DateTime($datetime);
    $interval = $providedDateTime->diff($currentDateTime);

    if ($interval->y >= 1) {
        $timeAgo = $interval->format("%y year" . ($interval->y > 1 ? "s" : "") . " ago");
    } elseif ($interval->m >= 1) {
        $timeAgo = $interval->format("%m month" . ($interval->m > 1 ? "s" : "") . " ago");
    } elseif ($interval->d >= 1) {
        $timeAgo = $interval->format("%d day" . ($interval->d > 1 ? "s" : "") . " ago");
    } elseif ($interval->h >= 1) {
        $timeAgo = $interval->format("%h hour" . ($interval->h > 1 ? "s" : "") . " ago");
    } elseif ($interval->i >= 1) {
        $timeAgo = $interval->format("%i minute" . ($interval->i > 1 ? "s" : "") . " ago");
    } else {
        $timeAgo = "Just now";
    }

    return $timeAgo;
}
?>
<div>
    @foreach($comments as $comment)
    <div class="user-block">
        <img class="img-circle img-bordered-sm" src="{{asset('dummy.png')}}" alt="User Image">
        <span class="username">
            <a href="#">{{ $comment->name}}</a>
        </span>
        <span class="description">Sent you a message - 
            {{ getTimeAgo(date("Y-m-d H:i:s",strtotime($comment->ago)))}}
        </span>
    </div>
    <p>
        {{ $comment->comment }}
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
