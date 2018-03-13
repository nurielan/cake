<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductPackage;

/**
 * ProductPackageSearch represents the model behind the search form of `common\models\ProductPackage`.
 */
class ProductPackageSearch extends ProductPackage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'discount', 'tax', 'in_stock', 'out_stock', 'weight'], 'integer'],
            [['no', 'name', 'alias', 'image1', 'image2', 'image3', 'description', 'status', 'type', 'product_item_1', 'product_item_2', 'product_item_3', 'product_item_4', 'product_item_5', 'product_item_6', 'product_item_7', 'product_item_8', 'product_item_9', 'product_item_10', 'custom', 'created_at', 'updated_at'], 'safe'],
            [['discount_price', 'tax_price', 'price'], 'number'],
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
        $query = ProductPackage::find();

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
            'tax' => $this->tax,
            'tax_price' => $this->tax_price,
            'in_stock' => $this->in_stock,
            'out_stock' => $this->out_stock,
            'price' => $this->price,
            'weight' => $this->weight,
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
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'product_item_1', $this->product_item_1])
            ->andFilterWhere(['like', 'product_item_2', $this->product_item_2])
            ->andFilterWhere(['like', 'product_item_3', $this->product_item_3])
            ->andFilterWhere(['like', 'product_item_4', $this->product_item_4])
            ->andFilterWhere(['like', 'product_item_5', $this->product_item_5])
            ->andFilterWhere(['like', 'product_item_6', $this->product_item_6])
            ->andFilterWhere(['like', 'product_item_7', $this->product_item_7])
            ->andFilterWhere(['like', 'product_item_8', $this->product_item_8])
            ->andFilterWhere(['like', 'product_item_9', $this->product_item_9])
            ->andFilterWhere(['like', 'product_item_10', $this->product_item_10])
            ->andFilterWhere(['like', 'custom', $this->custom]);

        return $dataProvider;
    }
}
