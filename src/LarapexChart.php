<?php namespace ArielMejiaDev\LarapexCharts;

use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\Types\Boolean;

class LarapexChart
{

    /*
    |--------------------------------------------------------------------------
    | Chart
    |--------------------------------------------------------------------------
    |
    | This class build the chart by passing setters to the object, it will 
    | use the method container and scripts to generate a JSON  
    | in blade views, it works also with Vue JS components  
    |
    */

    public $id;
    protected $title;
    protected $subtitle;
    protected $subtitlePosition;
    protected $type = 'donut';
    protected $labels;
    protected $dataset;
    protected $height = 350;
    protected $colors;
    protected $horizontal;
    protected $xAxis;
    protected $grid;
    protected $stroke;
    private $chartLetters = 'abcdefghijklmnopqrstuvwxyz';
    protected $toolbar;
    protected $zoom;
    protected $dataLabels;
    protected $shadow;
    protected $annotations;
    public function __construct()
    {
        $this->id = substr(str_shuffle(str_repeat($x = $this->chartLetters, ceil(25 / strlen($x)))), 1, 25);
        $this->horizontal = json_encode(['horizontal' => false]);
        $this->colors = json_encode(config('larapex-charts.colors'));
        $this->setXAxis([]);
        $this->shadow([]);
        $this->grid([]);
        $this->stroke([]);
        $this->annotations([]);
        $this->zoom = json_encode(['enabled' => true]);
        $this->toolbar = json_encode(['show' => true]);
        $this->dataLabels = json_encode(['enabled' => true]);
        return $this;
    }

    public function setType($type = null)
    {
        $this->type = $type;
        return $this;
    }

    public function setDataset($dataset)
    {
        $this->dataset = json_encode($dataset);
        return $this;
    }

    public function setHeight(int $height)
    {
        $this->height = $height;
        return $this;
    }

    public function setColors(array $colors)
    {
        $this->colors = json_encode($colors);
        return $this;
    }

    public function setHorizontal(bool $horizontal)
    {
        $this->horizontal = json_encode(['horizontal' => $horizontal]);
        return $this;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function setSubtitle(string $subtitle, string $position = 'left')
    {
        $this->subtitle = $subtitle;
        $this->subtitlePosition = $position;
        return $this;
    }

    public function setLabels(array $labels)
    {
        $this->labels = $this->transformLabels($labels);
        return $this;
    }

    public function setXAxis(array $categories)
    {
        $this->xAxis = json_encode($categories);
        return $this;
    }

    public function setShadow(array $options)
    {
        $this->shadow = json_encode($options);
        return $this;
    }

    public function setGrid(array $options)
    {
        $this->grid = json_encode($options);
        return $this;
    }

    public function setToolbar(bool $show)
    {
        $this->toolbar = json_encode(['show' => $show]);
        return $this;
    }

    public function setZoom(bool $enabled)
    {
        $this->zoom = json_encode(['enabled' => $enabled]);
        return $this;
    }

    public function setdataLabels(bool $enabled)
    {
        $this->dataLabels = json_encode(['enabled' => $enabled]);
        return $this;
    }

    public function setStroke(array $options)
    {
        $this->stroke = json_encode($options);
        return $this;
    }

    public function setAnnotations(array $options)
    {
        $this->annotations = json_encode($options);
        return $this;
    }

    public function transformLabels(array $array)
    {
        $stringArray = array_filter($array, function($string){
            return "{$string}";
        });
        return '"' . implode('","', $stringArray) . '"';
    }

    public function container()
    {
        return View::make('larapex-charts::chart.container', ['id' => $this->id()]);
    }

    public function script()
    {
        return View::make('larapex-charts::chart.script', ['chart' => $this]);
    }

    public function cdn()
    {
        return 'https://cdn.jsdelivr.net/npm/apexcharts';
    }

    /**
     * @return false|string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function subtitle()
    {
        return $this->subtitle;
    }

    /**
     * @return mixed
     */
    public function subtitlePosition()
    {
        return $this->subtitlePosition;
    }

    /**
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function labels()
    {
        return $this->labels;
    }

    /**
     * @return mixed
     */
    public function dataset()
    {
        return $this->dataset;
    }

    /**
     * @return int
     */
    public function height()
    {
        return $this->height;
    }

    /**
     * @return false|string
     */
    public function colors()
    {
        return $this->colors;
    }

    /**
     * @return false|string
     */
    public function horizontal()
    {
        return $this->horizontal;
    }

    /**
     * @return mixed
     */
    public function xAxis()
    {
        return $this->xAxis;
    }

    /**
     * @return array
     */
    public function grid()
    {
        return $this->grid;
    }

    /**
     * @return array
     */
    public function annotations()
    {
        return $this->annotations;
    }

    /**
     * @return true|boolean
     */
    public function toolbar()
    {
        return $this->toolbar;
    }

    /**
     * @return true|boolean
     */
    public function zoom()
    {
        return $this->zoom;
    }

    /**
     * @return true|boolean
     */
    public function dataLabels()
    {
        return $this->dataLabels;
    }

    /**
     * @return mixed
     */
    public function shadow()
    {
        return $this->shadow;
    }

    /**
     * @return array
     */
    public function stroke()
    {
        return $this->stroke;
    }

}
