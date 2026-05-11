<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_rating".
 *
 * @property int $id
 * @property int|null $book_id
 * @property int $rating
 *
 * @property Book $book
 */
class BookRating extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id'], 'default', 'value' => null],
            [['book_id', 'rating'], 'default', 'value' => null],
            [['book_id', 'rating'], 'integer'],
            [['rating'], 'required'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'rating' => 'Rating',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id' => 'book_id']);
    }

}
