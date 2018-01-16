<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RatingItem;

/**
 * RatingItemSearch represents the model behind the search form about `common\models\RatingItem`.
 */
class RatingItemSearch extends RatingItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'candidate_id', 'additional_id', 'rating_group_id', 'rating_id'], 'integer'],
            [['score'], 'safe'],
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
        $query = RatingItem::find();

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
            'candidate_id' => $this->candidate_id,
            'additional_id' => $this->additional_id,
            'rating_group_id' => $this->rating_group_id,
            'rating_id' => $this->rating_id,
        ]);

        $query->andFilterWhere(['like', 'score', $this->score]);

        return $dataProvider;
    }
}
