# Chart Data Query Project

## Files to look at
- /tests
- /database
- /app/Models
- /app/Services

## Expected chart data description
The starting point is a competition.
Competition has different fields.
In each field we have participants and examiners.
Examiners are grouped and counted by age range in column #1.
Participants are grouped and counted by age range in column #2.

## Questions
How is the js chart library supposed to separate data of columns 1 and 2, as they are on the same level on the json?
- It's up to us.
What's the relationship of the models?
- Competition has many Groups
- Group belongs to many Fields
- Field belongs to many Groups
- Field has many Challenges
- Challenge belongs to an Age Group
- Challenge has many Participants
- Some participants have one Examiner profile which means they have taken the exam

## How would the query look like
```
competition
->groups
->fields
->challenges grouped by age_range
->examiner participants and non examiner participants count

competition
->age_ranges
->challenges grouped by field
->examiner participants and non examiner participants count
```
