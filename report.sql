SELECT
    DATE(s.created_at) AS 'day',
    d.os AS os,
    #Count içinde if else gibi şart eklendi
    COUNT(CASE WHEN s.status = 'started' THEN 1 END) as started,
    COUNT(CASE WHEN s.status = 'canceled' THEN 1 END) AS canceled,
    COUNT(CASE WHEN s.status = 'renewed' THEN 1 END) AS renewed
FROM
    `subscriptions` s
    INNER JOIN
    devices d ON s.device_id = d.id
GROUP BY
    #güne göre formatlasın
    DATE(s.created_at),
    d.os;
