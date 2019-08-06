<section id="about" class="section-bg">
    <div class="container-fluid">
        <div class="section-header about-text">
            <h3 class="section-title">{{array_get($about,'0.title') == null ? 'คิดถึงเบเกอรี่  ยินดีต้อนรับ' : array_get($about,'0.title')}}</h3>
            <span class="section-divider"></span>
            <p class="section-description">
                {!!   array_get($about,'0.description') == null ? '<p> คิดถึงเบเกอรี่เป็นร้านจำหน่ายขนมที่ใหญ่ที่สุดในบรุรีรัมย์ มีร้านสาขาทั่วจอำเภอเมืองบุรีรัมย์ <br> และมีรายการขนมมากกว่าหนึ่งร้อยชนิด </p>'
             : array_get($about,'0.description') !!}
            </p>
        </div>
    </div>
    <br>
</section>
