<div class="accordion-group">
    <div class="accordion-heading">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
           href="#collapse{{$count}}">
            {{ $head }}
        </a>
    </div>
    <div id="collapse{{ $count }}" class="accordion-body collapse">
        <div class="accordion-inner">
            {!! $content !!}
        </div>
    </div>
</div>
