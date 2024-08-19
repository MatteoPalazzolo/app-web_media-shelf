<style>
<?= file_get_contents(__DIR__ . "/intro.css"); ?>
</style>

<main>
    <svg class="circle" xmlns="http://www.w3.org/2000/svg">
            
        <mask id="clip-mask">
            <rect width="300%" height="100%" fill="white"/>
            <circle r="0" cx="50%" cy="50%" fill="black">
                <animate
                    attributeName="r"
                    from="0"
                    to="150%"
                    dur=".5s"
                    begin="1.2s"
                    fill="freeze"
                />
            </circle>
        </mask>

        <g mask="url(#clip-mask)">
            
            <rect width="100%" height="100%" fill="var(--color-bufudyne)"/>

            <!--
            <circle r="0" cx="50%" cy="50%" mask="url(#erase-mask)" fill="var(--color-bufudyne)">
                <animate
                    attributeName="r"
                    from="0"
                    to="150%"
                    dur=".5s"
                    begin="0s"
                    fill="freeze"
                />
            </circle>
            -->

            <circle r="0" cx="50%" cy="50%" fill="var(--color-agidyne)">
                <animate
                    attributeName="r"
                    from="0"
                    to="150%"
                    dur=".5s"
                    begin=".2s"
                    fill="freeze"
                />
            </circle>

            <circle r="0" cx="50%" cy="50%" fill="var(--color-ziodyne)">
                <animate
                    attributeName="r"
                    from="0"
                    to="150%"
                    dur=".5s"
                    begin=".7s"
                    fill="freeze"
                />
            </circle>
            
        </g>
    </svg>

    <p  class="date" 
        hx-get="/pages/cards-list-page/cards-list-page.php" 
        hx-target="body" 
        hx-trigger="click delay:1s"
        onclick="$(this).addClass('open')">
        <?= date('d/m/Y'); ?>
    </p>
</main>

<script>
    setTimeout(function() {
        $(".circle").hide();
    }, 1700);
</script>
