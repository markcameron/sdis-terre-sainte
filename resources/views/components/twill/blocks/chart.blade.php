<div>
    <canvas id="chart-{{ $block->id }}"></canvas>
</div>

<script>
    const ctx = document.getElementById('chart-{{ $block->id }}');
    const myChart = new Chart(ctx, {!! $block->input('config') !!});
</script>
