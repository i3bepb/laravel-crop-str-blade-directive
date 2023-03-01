<?php

namespace I3bepb\CropStrBladeDirective\Tests;

use I3bepb\CropStrBladeDirective\CropStr;
use I3bepb\CropStrBladeDirective\ServiceProvider;
use I3bepb\ReflectionForTest\AccessToMethod;
use Orchestra\Testbench\TestCase;

class CropStrTest extends TestCase
{
    use AccessToMethod;

    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }

    /**
     * @test
     *
     * @throws \ReflectionException
     */
    public function crop_over()
    {
        $cropStr = new CropStr();

        $strLong = 'Сложно сказать, почему ключевые особенности структуры проекта объективно рассмотрены соответствующими инстанциями. Наше дело не так однозначно, как может показаться: дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании стандартных подходов. Имеется спорная точка зрения, гласящая примерно следующее: сделанные на базе интернет-аналитики выводы призывают нас к новым свершениям, которые, в свою очередь, должны быть представлены в исключительно положительном свете. Следует отметить, что консультация с широким активом является качественно новой ступенью своевременного выполнения сверхзадачи. Для современного мира понимание сути ресурсосберегающих технологий позволяет выполнить важные задания по разработке вывода текущих активов. Ясность нашей позиции очевидна: укрепление и развитие внутренней структуры способствует подготовке и реализации дальнейших направлений развития. Но социально-экономическое развитие, а также свежий взгляд на привычные вещи — безусловно открывает новые горизонты для новых предложений. Лишь диаграммы связей разоблачены. Высокий уровень вовлечения представителей целевой аудитории является четким доказательством простого факта: курс на социально-ориентированный национальный проект создаёт предпосылки для системы обучения кадров, соответствующей насущным потребностям. В своём стремлении улучшить пользовательский опыт мы упускаем, что диаграммы связей неоднозначны и будут призваны к ответу. Современные технологии достигли такого уровня, что новая модель организационной деятельности не оставляет шанса для как самодостаточных, так и внешне зависимых концептуальных решений. Противоположная точка зрения подразумевает, что сторонники тоталитаризма в науке призывают нас к новым свершениям, которые, в свою очередь, должны быть разоблачены. Принимая во внимание показатели успешности, убеждённость некоторых оппонентов выявляет срочную потребность системы обучения кадров, соответствующей насущным потребностям. Банальные, но неопровержимые выводы, а также некоторые особенности внутренней политики указаны как претенденты на роль ключевых факторов.';

        $this->assertEquals(3999, strlen($strLong));

        $strCrop = $this->privateMethodWithParameters($cropStr, 'crop', [$strLong, 1000]);

        $this->assertEquals(1000, strlen($strCrop));
    }

    /**
     * @test
     *
     * @throws \ReflectionException
     */
    public function crop_under()
    {
        $cropStr = new CropStr();

        $strUnderCropLength = 'Сложно сказать, почему ключевые особенности структуры проекта объективно рассмотрены соответствующими инстанциями.';

        $this->assertEquals(216, strlen($strUnderCropLength));

        $strCrop = $this->privateMethodWithParameters($cropStr, 'crop', [$strUnderCropLength, 1000]);

        $this->assertEquals(216, strlen($strCrop));

        $this->assertEquals($strUnderCropLength, $strCrop);
    }

    /**
     * @test
     *
     * @throws \ReflectionException
     */
    public function check_need_crop()
    {
        $cropStr = new CropStr();

        $strUnderCropLength = 'Сложно сказать, почему ключевые особенности структуры проекта объективно рассмотрены соответствующими инстанциями.';

        $this->assertEquals(216, strlen($strUnderCropLength));

        $this->assertFalse($this->privateMethodWithParameters($cropStr, 'checkNeedCrop', [$strUnderCropLength, 1000]));

        $this->assertTrue($this->privateMethodWithParameters($cropStr, 'checkNeedCrop', [$strUnderCropLength, 200]));

        $this->assertFalse($this->privateMethodWithParameters($cropStr, 'checkNeedCrop', [$strUnderCropLength, 216]));
    }

    /**
     * @test
     */
    public function apply_equal()
    {
        $cropStr = new CropStr();

        $str = 'Сложно сказать, почему ключевые особенности структуры проекта объективно рассмотрены соответствующими инстанциями.';

        $this->assertEquals(216, strlen($str));

        $strCrop = $cropStr->apply($str, 216);

        $this->assertEquals($str, $strCrop);

        $this->assertEquals(216, strlen($strCrop));
    }

    /**
     * @test
     */
    public function apply_over()
    {
        $cropStr = new CropStr();

        $str = 'Сложно сказать, почему ключевые особенности структуры проекта объективно рассмотрены соответствующими инстанциями.';

        $this->assertEquals(216, strlen($str));

        $strCrop = $cropStr->apply($str, 1000);

        $this->assertEquals($str, $strCrop);

        $this->assertEquals(216, strlen($strCrop));
    }

    /**
     * @test
     */
    public function apply_under()
    {
        $cropStr = new CropStr();

        $str = 'Сложно сказать, почему ключевые особенности структуры проекта объективно рассмотрены соответствующими инстанциями.';

        $this->assertEquals(216, strlen($str));

        $strCrop = $cropStr->apply($str, 100);

        $this->assertNotEquals($str, $strCrop);

        $this->assertEquals(103, strlen($strCrop));

        $this->assertEquals('Сложно сказать, почему ключевые особенности структуры...', $strCrop);
    }
}
