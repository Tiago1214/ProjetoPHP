<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LinhaPedido;

/**
 * LinhaPedidoSearch represents the model behind the search form of `common\models\LinhaPedido`.
 */
class LinhaPedidoSearch extends LinhaPedido
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'quantidade', 'taxaiva', 'pedido_id', 'artigo_id'], 'integer'],
            [['valorunitario', 'valoriva'], 'number'],
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
            'quantidade' => $this->quantidade,
            'valorunitario' => $this->valorunitario,
            'valoriva' => $this->valoriva,
            'taxaiva' => $this->taxaiva,
            'pedido_id' => $this->pedido_id,
            'artigo_id' => $this->artigo_id,
        ]);

        return $dataProvider;
    }
}
