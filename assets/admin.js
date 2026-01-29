const { createElement, render, useState, useEffect } = wp.element;

function RCWMDashboard() {
    const [posts, setPosts] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        fetch(RCWM_API.url, {
            headers: {
                'X-WP-Nonce': RCWM_API.nonce
            }
        })
        .then(res => res.json())
        .then(data => {
            setPosts(data);
            setLoading(false);
        })
        .catch(() => setLoading(false));
    }, []);

    if (loading) {
        return createElement('p', null, 'Loading editorial contents...');
    }

    if (!posts.length) {
        return createElement('p', null, 'No editorial content found.');
    }

    return createElement(
        'div',
        null,
        createElement('h2', null, 'Editorial Workflow Dashboard'),
        createElement(
            'table',
            { className: 'widefat fixed striped' },
            createElement(
                'thead',
                null,
                createElement(
                    'tr',
                    null,
                    createElement('th', null, 'Title'),
                    createElement('th', null, 'Author'),
                    createElement('th', null, 'Status')
                )
            ),
            createElement(
                'tbody',
                null,
                posts.map(post =>
                    createElement(
                        'tr',
                        { key: post.id },
                        createElement('td', null, post.title),
                        createElement('td', null, post.author),
                        createElement('td', null, post.status)
                    )
                )
            )
        )
    );
}

render(
    createElement(RCWMDashboard),
    document.getElementById('rcwm-admin-root')
);
