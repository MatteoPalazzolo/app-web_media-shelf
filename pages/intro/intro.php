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
            
            <rect width="100%" height="100%" fill="var(--color-bufu)"/>

            <!--
            <circle r="0" cx="50%" cy="50%" mask="url(#erase-mask)" fill="var(--color-bufu)">
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

            <circle r="0" cx="50%" cy="50%" fill="var(--color-agi)">
                <animate
                    attributeName="r"
                    from="0"
                    to="150%"
                    dur=".5s"
                    begin=".2s"
                    fill="freeze"
                />
            </circle>

            <circle r="0" cx="50%" cy="50%" fill="var(--color-zio)">
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

    <p class="date" onclick="nextPage()">
        <?= date('d/m/Y'); ?>
    </p>
</main>

<script>
    setTimeout(function() {
        $(".circle").hide();
    }, 1700);
    function nextPage() {
        $(".date").addClass('open');
        setTimeout(() => $.ajax({
            url: '/pages/main/main.php' + window.location.search,
            type: 'GET',
            success: function(response) {
                $("body").html(response);
            },
            error: function(xhr, status, error) {
                console.error("An error occurred while loading in index.php: " + error);
            }
        }), 1000);
    }
</script>
