import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Example extends Component {
    constructor(props) {
        super(props);

        this.state = {
            modalOpen: false,
        }
    }

    clickOpen() {
        this.setState({ modalOpen: true });
    }

    clickClose() {
        this.setState({ modalOpen: false });
    }


    render() {
        let modal;
        if (this.state.modalOpen) {
            modal = (
                <div>
                    <p className="text-center mt-2">プログラミングの学習教材の口コミを見て、<br />
                        学習する教材の選定に役立ちます。<br />
                        自分でも口コミに投稿出来ます。</p>
                    <button className="btn btn-outline-danger mx-auto d-block" onClick={() => { this.clickClose() }}>閉じる</button>
                </div>
            );
        }
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card mt-4 mb-3">
                            <button className="btn btn-secondary"
                                onClick={() => { this.clickOpen() }}>
                                このサイトは何??</button>
                            {modal}
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
