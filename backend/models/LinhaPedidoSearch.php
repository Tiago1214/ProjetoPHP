<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\LinhaPedido;

/**
 * LinhaPedidoSearch represents the model behind the search form of `backend\models\LinhaPedido`.
 */
class LinhaPedidoSearch extends LinhaPedido
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pedido_id'], 'integer'],
            [['data', 'preco', 'iva'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = LinhaPedido::find();

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
            'data' => $this->data,
            'pedido_id' => $this->pedido_id,
        ]);

        $query->andFilterWhere(['like', 'preco', $this->preco])
            ->andFilterWhere(['like', 'iva', $this->iva]);

        return $dataProvider;
    }
}
