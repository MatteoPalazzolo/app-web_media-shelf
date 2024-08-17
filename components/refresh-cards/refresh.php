<style>
<?= file_get_contents(__DIR__ . "/refresh.css"); ?>
</style>

<svg id="svg-animation" class="circle" xmlns="http://www.w3.org/2000/svg" style="display: none;">
        
    <mask id="clip-mask">
        <rect width="300%" height="100%" fill="white"/>
        <circle id="circle-mask" r="0" cx="50%" cy="50%" fill="black">
            <animate
                attributeName="r"
                from="0"
                to="150%"
                dur=".4s"
                begin="indefinite"
                fill="freeze" />
            <set attributeName="r" to="0" />
        </circle>
    </mask>

    <g mask="url(#clip-mask)">
        
        <rect width="100%" height="100%" fill="var(--color-secondary)"/>
    
        <circle id="circle-one" r="0" cx="50%" cy="50%" fill="var(--color-primary)">
            <animate
                attributeName="r"
                from="0"
                to="150%"
                dur=".4s"
                begin="indefinite"
                fill="freeze" />
            <set attributeName="r" to="0" />
        </circle>

        <circle id="circle-two" r="0" cx="50%" cy="50%" fill="var(--color-details)">
            <animate
                attributeName="r"
                from="0"
                to="150%"
                dur=".4s"
                begin="indefinite"
                fill="freeze" />
            <set attributeName="r" to="0" />
        </circle>
        
    </g>
</svg>

<script>
function refreshCardsList() {

    $("body").css("overflow","hidden");

    $.ajax({
        url: '/api/get/main-page-content.php',
        type: 'GET',
        success: function(response) {
            $("#container").html(response);
        },
        error: function(xhr, status, error) {
            console.error("An error occurred: " + error);
        }
    });

    $("#svg-animation").show();

    setTimeout(() => $("#circle-one > animate")[0].beginElement(), 200);
    setTimeout(() => $("#circle-two > animate")[0].beginElement(), 500);
    setTimeout(() => $("#circle-mask > animate")[0].beginElement(), 750);
    setTimeout(() => {     
        // reset page state
        $("#svg-animation").hide();
        $("body").css("overflow","visible");

        // reset for next time
        $("#circle-one > set")[0].beginElement();
        $("#circle-two > set")[0].beginElement();
        $("#circle-mask > set")[0].beginElement();
    }, 1150);
    
}
</script>