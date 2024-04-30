<div class="position-relative d-flex border rounded flex-column flex-nowrap row-gap-1 px-1" style="width: 13rem; height: 22rem;">
    <span class="overflow-hidden align-self-start" style="font-size: 1rem">{{$datePublished}}</span>
    <span class="overflow-hidden align-self-center" style="font-size: 1rem">{{$name}}</span>
    <a href="/instruction?id={{$id}}" class="link-underline link-underline-opacity-0 text-black hover-zoom d-flex justify-content-center" target="_blank">
        <img src="{{asset('storage/'.$imagecover)}}" alt="picture" class="align-self-center" style="max-width: 10rem; min-width: 8rem; height: 11.6rem;"></img>
    </a>
    <span class="overflow-hidden text-center pb-2" style="font-size: 0.8rem">{{$description}}</span>
    <div style="font-size:0.8rem" class="overflow-hidden d-flex flex-column pb-1">
        Created by: <a href="/user?id={{$userid}}" target="_blank" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><span class="fw-bold">{{$user}}</span></a>
    </div>
        @if($approvalid == 1) <div class="position-absolute bg-success text-left rounded-end bg-opacity-75 start-0" style="top: 62.5%; padding: .5px">Approved</div>
        @elseif ($approvalid == 2) <div class="position-absolute bg-warning text-left rounded-end bg-opacity-75 start-0" style="top: 62.5%; padding: .5px">Waiting</div>
        @elseif ($approvalid == 3) <div class="position-absolute bg-danger text-left rounded-end bg-opacity-75 start-0" style="top: 62.5%; padding: .5px">NotApproved</div>
        @endif
</div>