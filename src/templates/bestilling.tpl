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
        <div class="order-block order-block-top-padding">
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
                <select name="product" id="product">
                    <option value="children">Barn &mdash; 200,-</option>
                    <option value="gentleman">Herre &mdash; 300,-</option>
                    <option value="lady">Dame &mdash; 400,-</option>
                    <option value="style">Style &mdash; 700,-</option>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <div class="order-block">
            <div class="order-left">
                <p>Eventuell beskjed:</p>
            </div>
            <div class="order-right">
                <input id="msg-order" type="text">
            </div>
            <div class="clear"></div>
        </div>
        <div class="order-block">
            <div class="order-left">
                <p>&nbsp;</p>
            </div>
            <div id="submit-wrap" class="order-right">
                <input id="submit-order" type="button" value="Reserver">
            </div>
            <div class="clear"></div>
        </div>
    </div>
</form>
[[+include file="footer.tpl"]]
