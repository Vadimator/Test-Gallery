<div class="container text-center">
    <nav>
        <ul class="pagination">
            <?php if($count > 1) : ?>
            <?php for ($i = 0; $i < $count; $i++) : ?>
                <li><a  href="javascript:void(0)"><?php echo $i + 1; ?></a></li>
            <?php endfor; ?>
            <?php endif; ?>
        </ul>
    </nav>
</div>
</article>