<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderItem;

/**
 * OrderItemSearch represents the model behind the search form of `common\models\OrderItem`.
 */
class OrderItemSearch extends OrderItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_item_discount', 'product_item_tax', 'product_item_weight', 'quantity', 'sub_discount', 'sub_tax', 'sub_weight'], 'integer'],
            [['order_list_no', 'product_item_no', 'product_item_name', 'product_item_alias', 'product_item_image1', 'product_item_image2', 'product_item_image3', 'product_item_type', 'product_item_description', 'user_address_title', 'user_address_name', 'user_address_address', 'user_address_subdistrict', 'user_address_subdistrict_no', 'user_address_district', 'user_address_district_no', 'user_address_province', 'user_address_province_no', 'user_address_postal_code', 'user_address_phone_number', 'created_at', 'updated_at'], 'safe'],
            [['product_item_discount_price', 'product_item_tax_price', 'product_item_price', 'sub_discount_price', 'sub_tax_price', 'sub_price'], 'number'],
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
        $query = OrderItem::find();

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
            'product_item_discount' => $this->product_item_discount,
            'product_item_discount_price' => $this->product_item_discount_price,
            'product_item_tax' => $this->product_item_tax,
            'product_item_tax_price' => $this->product_item_tax_price,
            'product_item_price' => $this->product_item_price,
            'product_item_weight' => $this->product_item_weight,
            'quantity' => $this->quantity,
            'sub_discount' => $this->sub_discount,
            'sub_discount_price' => $this->sub_discount_price,
            'sub_tax' => $this->sub_tax,
            'sub_tax_price' => $this->sub_tax_price,
            'sub_weight' => $this->sub_weight,
            'sub_price' => $this->sub_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'order_list_no', $this->order_list_no])
            ->andFilterWhere(['like', 'product_item_no', $this->product_item_no])
            ->andFilterWhere(['like', 'product_item_name', $this->product_item_name])
            ->andFilterWhere(['like', 'product_item_alias', $this->product_item_alias])
            ->andFilterWhere(['like', 'product_item_image1', $this->product_item_image1])
            ->andFilterWhere(['like', 'product_item_image2', $this->product_item_image2])
            ->andFilterWhere(['like', 'product_item_image3', $this->product_item_image3])
            ->andFilterWhere(['like', 'product_item_type', $this->product_item_type])
            ->andFilterWhere(['like', 'product_item_description', $this->product_item_description])
            ->andFilterWhere(['like', 'user_address_title', $this->user_address_title])
            ->andFilterWhere(['like', 'user_address_name', $this->user_address_name])
            ->andFilterWhere(['like', 'user_address_address', $this->user_address_address])
            ->andFilterWhere(['like', 'user_address_subdistrict', $this->user_address_subdistrict])
            ->andFilterWhere(['like', 'user_address_subdistrict_no', $this->user_address_subdistrict_no])
            ->andFilterWhere(['like', 'user_address_district', $this->user_address_district])
            ->andFilterWhere(['like', 'user_address_district_no', $this->user_address_district_no])
            ->andFilterWhere(['like', 'user_address_province', $this->user_address_province])
            ->andFilterWhere(['like', 'user_address_province_no', $this->user_address_province_no])
            ->andFilterWhere(['like', 'user_address_postal_code', $this->user_address_postal_code])
            ->andFilterWhere(['like', 'user_address_phone_number', $this->user_address_phone_number]);

        return $dataProvider;
    }
}
