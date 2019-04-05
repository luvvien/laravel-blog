<?php
/**
 * Created by PhpStorm.
 * User: vien
 * Date: 2019/1/31
 * Time: 11:26 AM
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{

    use SoftDeletes;

    protected $allowEmpty = [];

    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * 默认使用时间戳戳功能
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * 获取当前时间
     *
     * @return int
     */
    public function freshTimestamp()
    {
        return time();
    }

    /**
     * 避免转换时间戳为时间字符串
     *
     * @param DateTime|int $value
     * @return DateTime|int
     */
    public function fromDateTime($value)
    {
        return $value;
    }

    /**
     * select的时候避免转换时间为Carbon
     *
     * @param mixed $value
     * @return mixed
     */
//  protected function asDateTime($value) {
//	  return $value;
//  }

    /**
     * 从数据库获取的为获取时间戳格式
     *
     * @return string
     */
    public function getDateFormat()
    {
        return 'U';
    }

    /**
     * check column and store
     * @param $data
     * @return $this|int
     */
    public function checkStore($data)
    {

        $validData = array();
        foreach ($this->fillable as $key) {
            if (isset($data[$key])) {
                $validData[$key] = $data[$key];
            } elseif (!in_array($key, $this->allowEmpty)) {
                return 0;
            }
        }

        return $this->fill($validData)->save();
    }

    /**
     * check column and update
     * @param $id
     * @param $data
     * @return $this|int
     */
    public function checkUpdate($id, $data)
    {
        $validData = array();
        foreach ($this->fillable as $key) {
            if (isset($data[$key])) {
                $validData[$key] = $data[$key];
            }
        }
        if ($validData) {
            return $this->where('id', $id)->update($validData);
        }
        return 0;
    }
}