<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article[]|\Cake\Collection\CollectionInterface $articles
 */
?>

                <h3>Articles</h3>
                <?= $this->Flash->render() ?>
                <?= $this->Html->link(
                    __('New Article'),
                    ['action' => 'add'],
                    ['class' => 'btn btn-success','style' => 'float:right;margin-bottom: 20px;width:131px']
                ) ?>
                <table class="table table-hover table-bordered ">
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('title') ?></th>
                        <th><?= $this->Paginator->sort('body') ?></th>
                        <th><?= $this->Paginator->sort('timestamp') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($articles as $article) : ?>
                        <tr>
                            <td><?= h($article->title) ?></td>
                            <td><?= $this->Text->truncate($article->body, 400) ?></td>
                            <td><?= h($article->timestamp) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(
                                    __('View'),
                                    ['action' => 'view', $article->article_id],
                                    ['class' => 'btn btn-info','style' => 'color:white']
                                ) ?>
                                <?= $this->Html->link(
                                    __('Edit'),
                                    ['action' => 'edit', $article->article_id],
                                    ['class' => 'btn btn-primary','style' => 'color:white']
                                ) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $article->article_id],
                                    ['class' => 'btn btn-danger','style' => 'color:white',
                                        'confirm' => __(
                                            'Are you sure you want to delete the article: {0}?',
                                            $article->title
                                        )]
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
       