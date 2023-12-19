@if(isset($pageBlocks) && $pageBlocks->count() > 0)
    @foreach($pageBlocks as $pageBlock)
        @if($pageBlock->block_type == 1)
            <div class="row mb-5">
                <div class="gallery">
                    <div class="col-lg-12 col-sm-4 col-12">
                        <a href="{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlock->img) }}" data-caption="Parking el Balcón de Baeza">
                            <img src="{{Voyager::image('pages/'.$contentPage->id.'/'.$pageBlock->img) }}" alt="Parking el Balcón de Baeza" class="mx-auto d-block" style="max-height: 500px">
                        </a>
                    </div>
                </div>
            </div>
        @endif
        @if($pageBlock->block_type == 2)

        @endif
        @if($pageBlock->block_type == 3)
            <div class="row">
                <div class="col-lg-12 col-sm-4 col-12">
                    {!! $pageBlock->text !!}
                </div>
            </div>
        @endif
        @if($pageBlock->block_type == 4)
            <div class="row">
                <div class="col-sm-12 col-12">
                    <p class="iframe-block">
                        {!! $pageBlock->iframe !!}
                    </p>
                </div>
            </div>
        @endif
        @if($pageBlock->block_type == 5)
            <div class="row">
                <div class="col-sm-12 col-12">
                    <h2>{!! $pageBlock->title !!}</h2>
                </div>
            </div>
        @endif
    @endforeach
@endif
