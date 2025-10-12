# TODO
## Important
Required features :
+ Create a Task
+ Edit a task
+ Validate a task
    + 1 <= Signifiance <= 5
    + 1 <= Urgency <= 5
    + 
+ Push Task to DB after validation
+ Filtering Tasks

Bonus features :
    + Calendar

## Pending
+ Edit task vue
    + Finish form html layout
    + Add a submit button
        + "Save" if task exists
        + "Create" if task is new
+ Edit controller
    + On GET => edit vue
    + On POST => create task in db (and tags and groups if needed)
    + On PUT => update task

## General
(It's funny, it's the todo list's todo list)

+ Task
    + Remove `isDone (bool)` since we already have that information (true if `doneDate` is defined, false if it's NULL)
    + Add a `hidden (bool)` field to know if we display or not the 

+ Views
    + Components
        + TaskCard
            + Make tags clickable and redirecting to a view that displays only task with this tag
            + Make groups clickable and redirecting to a view that displays only task in this group
            + Better style for rating
        + TagsList
        + GroupsList
        + Header
        + Calendar
            + A small calendar display to show tasks (with a date) easier.
    + Main (view all tasks with menus)
        + By default, display only task with low `isDone`.
        + List of Tags
        + List of groups
        + Header
    + Create Task / Edit Task
        + Use a checkbox list with tag names
            + Input at the end to add tags if needed
        + Selector to select group with a "new" choice that adds a text input and a color input for the new groups.
    + Filtered vues
        + Tags
        + Groups
        + Hidden tasks