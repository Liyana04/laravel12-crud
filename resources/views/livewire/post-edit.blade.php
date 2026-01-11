<div>
    <flux:modal name="edit-post" class="md:w-200">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Edit Post</flux:heading>
            <flux:text class="mt-2">Add detail for the post.</flux:text>
        </div>

        <flux:input wire:model="title" label="Title" placeholder="Your Title" />
        <flux:textarea wire:model="body" label="Body" placeholder="Your Body" />

        <div class="flex">
            <flux:spacer />

            <flux:button type="submit" variant="primary" wire:click="update">Update</flux:button>
        </div>
    </div>
</flux:modal>
</div>
