[[+assign var="TITLE" value="Bestilling"]][[+include file="header.tpl"]]
<h1 class="center">Bestilling av time</h1>
<form action="bestilling" method="post" id="order-form" name="order-form">
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
        <div class="order-block order-block-unpoco-top-padding">
            <div class="order-left">
                <p>Velg produkt:</p>
            </div>
            <div class="order-right">
                <select name="product" id="product">
                    <option value="barn">Barn &mdash; 200,-</option>
                    <option value="herre">Herre &mdash; 300,-</option>
                    <option value="dame">Dame &mdash; 400,-</option>
                    <option value="style">Style &mdash; 700,-</option>
                </select>
            </div>
            <div class="clear"></div>
        </div>
        <div class="order-block order-block-unpoco-top-padding">
            <div class="order-left">
                <p>Ditt navn:</p>
            </div>
            <div class="order-right">
                <input type="text" name="name" id="name" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="order-block order-block-unpoco-top-padding">
            <div class="order-left">
                <p>Eventuell beskjed:</p>
            </div>
            <div class="order-right">
                <input type="text" name="msg" id="msg" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="order-block order-block-unpoco-top-padding">
            <div class="order-left">
                <p>&nbsp;</p>
            </div>
            <div id="submit-wrap" class="order-right">
                <input id="submit-order" type="submit" value="Bestill" />
            </div>
            <div class="clear"></div>
        </div>
    </div>
</form>
[[+include file="footer.tpl"]]
