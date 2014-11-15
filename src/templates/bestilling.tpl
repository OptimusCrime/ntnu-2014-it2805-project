[[+assign var="TITLE" value="Bestilling"]][[+include file="header.tpl"]]
<h1 class="center">Bestilling av time</h1>
<form action="bestilling" method="post">
    <div id="order" class="block">
        <div class="order-block">
            <div class="order-left">
                <p>Velg dato:</p>
            </div>
            <div class="order-right">
                <div id="calendar"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="order-block">
            <div class="order-left">
                <p>Velg klokkeslett:</p>
            </div>
            <div class="order-right">
                <div id="slots"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="order-block">
            <div class="order-left">
                <p>Velg produkt:</p>
            </div>
            <div class="order-right">
                <p>derp</p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="order-block">
            <div class="order-left">
                <p>Eventuell beskjed:</p>
            </div>
            <div class="order-right">
                <p>derp</p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="order-block">
            <div class="order-left">
                <p>&nbsp;</p>
            </div>
            <div class="order-right">
                <p>Send</p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</form>
[[+include file="footer.tpl"]]