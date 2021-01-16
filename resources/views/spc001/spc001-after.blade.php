<x-app-layout>
    <section class="t-section">
    </section>
    <div class="modal js-modal" id="after">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <p>終了したコンテストです。</p>
            <p>次回のコンテストにぜひご参加ください。</p>
            <a href= <?php echo url('/spc001/top'); ?>>戻る</a>
        </div><!--modal__inner-->
    </div><!--modal-->
    <script>
        $('div#after.js-modal').fadeIn();
    </script>
</x-app-layout>
