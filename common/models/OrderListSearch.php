<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderList;

/**
 * OrderListSearch represents the model behind the search form of `common\models\OrderList`.
 */
class OrderListSearch extends OrderList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'quantity', 'discount', 'tax', 'weight'], 'integer'],
            [['no', 'cashier', 'user_no', 'user_username', 'user_email', 'user_image', 'user_role', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = OrderList::find();

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
            'quantity' => $this->quantity,
            'discount' => $this->discount,
            'discount_price' => $this->discount_price,
            'tax' => $this->tax,
            'tax_price' => $this->tax_price,
            'weight' => $this->weight,
            'price' => $this->price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'no', $this->no])
            ->andFilterWhere(['like', 'cashier', $this->cashier])
            ->andFilterWhere(['like', 'user_no', $this->user_no])
            ->andFilterWhere(['like', 'user_username', $this->user_username])
            ->andFilterWhere(['like', 'user_email', $this->user_email])
            ->andFilterWhere(['like', 'user_image', $this->user_image])
            ->andFilterWhere(['like', 'user_role', $this->user_role])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
