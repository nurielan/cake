<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductBrand;

/**
 * ProductBrandSearch represents the model behind the search form of `common\models\ProductBrand`.
 */
class ProductBrandSearch extends ProductBrand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'discount'], 'integer'],
            [['no', 'name', 'alias', 'image1', 'image2', 'image3', 'description', 'status', 'created_at', 'updated_at'], 'safe'],
            [['discount_price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ProductBrand::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'discount' => $this->discount,
            'discount_price' => $this->discount_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'no', $this->no])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'image1', $this->image1])
            ->andFilterWhere(['like', 'image2', $this->image2])
            ->andFilterWhere(['like', 'image3', $this->image3])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
