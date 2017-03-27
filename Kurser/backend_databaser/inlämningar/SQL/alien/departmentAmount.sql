
SELECT (SELECT name FROM departments WHERE id = department_id) as Rank, COUNT(1) as Count FROM crew_department GROUP BY crew_department.department_id; 