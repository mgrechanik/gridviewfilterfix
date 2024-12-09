<?php
declare(strict_types=1);

namespace mgrechanik\gridviewfilterfix;

use yii\base\Model;
use yii\bootstrap5\Html;

class Bs5DataColumn extends \yii\grid\DataColumn
{
    /**
     * {@inheritdoc}
     */
    protected function renderFilterCellContent()
    {
        if (is_string($this->filter)) {
            return $this->filter;
        }

        $model = $this->grid->filterModel;

        if ($this->filter !== false && $model instanceof Model && $this->filterAttribute !== null && $model->isAttributeActive($this->filterAttribute)) {
            if ($model->hasErrors($this->filterAttribute)) {
                // Instead of these two core lines
                //Html::addCssClass($this->filterOptions, 'has-error');
                //$error = ' ' . Html::error($model, $this->filterAttribute, $this->grid->filterErrorOptions);
                // I add these two lines
                Html::addCssClass($this->filterInputOptions, 'is-invalid');
                $error = ' ' . Html::error($model, $this->filterAttribute);                
            } else {
                $error = '';
            }
            if (is_array($this->filter)) {
                $options = array_merge(['prompt' => '', 'strict' => true], $this->filterInputOptions);
                return Html::activeDropDownList($model, $this->filterAttribute, $this->filter, $options) . $error;
            } elseif ($this->format === 'boolean') {
                $options = array_merge(['prompt' => '', 'strict' => true], $this->filterInputOptions);
                return Html::activeDropDownList($model, $this->filterAttribute, [
                    1 => $this->grid->formatter->booleanFormat[1],
                    0 => $this->grid->formatter->booleanFormat[0],
                ], $options) . $error;
            }
            $options = array_merge(['maxlength' => true], $this->filterInputOptions);

            return Html::activeTextInput($model, $this->filterAttribute, $options) . $error;
        }
        // And adjusted this line
        return \yii\grid\Column::renderFilterCellContent();
    }
}