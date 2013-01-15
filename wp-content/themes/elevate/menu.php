
<div class="menu">
    <div class="menu-item">Item 1</div>
    <div class="submenu item1">
        <div class="submenu-column item1"></div>
        <div class="submenu-column item2"></div>
        <div class="submenu-column item3"></div>
    </div>
    <div class="menu-item">Item 2</div>
    <div class="submenu item2">
        <div class="submenu-column item1"></div>
        <div class="submenu-column item2"></div>
        <div class="submenu-column item3"></div>
    </div>
    <div class="menu-item">Item 3</div>
    <div class="submenu item3">
        <div class="submenu-column item1"></div>
        <div class="submenu-column item2"></div>
        <div class="submenu-column item3"></div>
    </div>
</div>

<script type="text/javascript">

    jQuery('.menu-item').bind('mouseover', function () {
        jQuery('.submenu').hide();
        jQuery(this).next('.submenu').show();
    });

    jQuery('.menu').bind('mouseleave', function () {
        jQuery('.submenu').hide();
    });

</script>