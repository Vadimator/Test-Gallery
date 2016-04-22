<div class="container text-center">
    <nav>
        <ul class="pagination">
            <?php for ($i = 0; $i < $count; $i++) : ?>
                <li><a  href="javascript:void(0)"><?php echo $i + 1; ?></a></li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>