@foreach($instructions as $instruction)
    @include('instruction.instruction_draw',[
        'user' => $instruction->user,
        'userid' => $instruction->userid,
        'datePublished' => $instruction->datePublished,
        'name' => $instruction->name,
        'description' => $instruction->description,
        'imagecover' => $instruction->imagecover,
        'approvalid' => $instruction->approvalid,
        'id' => $instruction->id
    ])
@endforeach
