<div>
    <input type="text" wire:model="name" />
    <button wire:click="submit">Submit</button>
    @if($success)<div>Saved</div>@endif
</div>
