<?php 
$this->Paginator->setTemplates([
  'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
  'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
  'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
  'current' => '<li class="page-item active" aria-current="page"><a class="page-link" href="{{url}}">{{text}}<span class="sr-only">(current)</span></a></li>',
  'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
  'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
]); ?>
<nav class="mt-4" aria-label="Paginación">
    <ul class="pagination mb-0">
        <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
    </ul>
    <p class="mt-2"><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de un total de {{count}}')) ?></p>
</nav>