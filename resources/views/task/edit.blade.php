{{ html()->modelForm($task, 'PATCH', route('tasks.update', $task))->open() }}
{{ html()->label('Статус', 'status') }}
{{ html()->select('status', $status->pluck('name', 'code'), $task->status) }}
{{ html()->submit('Обновить')->class('btn btn-primary') }}
{{ html()->closeModelForm() }}
