---
license: apache-2.0
tags:
- generated_from_keras_callback
model-index:
- name: assamim/mt5-small-indonesian-sum
  results: []
---

<!-- This model card has been generated automatically according to the information Keras had access to. You should
probably proofread and complete it, then remove this comment. -->

# assamim/mt5-small-indonesian-sum

This model is a fine-tuned version of [google/mt5-small](https://huggingface.co/google/mt5-small) on an unknown dataset.
It achieves the following results on the evaluation set:
- Train Loss: 4.6665
- Validation Loss: 2.6526
- Train Rouge1: 19.7876
- Train Rouge2: 6.6344
- Train Rougel: 16.7880
- Train Rougelsum: 16.8459
- Train Gen Len: 18.92
- Epoch: 0

## Model description

More information needed

## Intended uses & limitations

More information needed

## Training and evaluation data

More information needed

## Training procedure

### Training hyperparameters

The following hyperparameters were used during training:
- optimizer: {'name': 'AdamWeightDecay', 'learning_rate': 2e-05, 'decay': 0.0, 'beta_1': 0.9, 'beta_2': 0.999, 'epsilon': 1e-07, 'amsgrad': False, 'weight_decay_rate': 0.01}
- training_precision: float32

### Training results

| Train Loss | Validation Loss | Train Rouge1 | Train Rouge2 | Train Rougel | Train Rougelsum | Train Gen Len | Epoch |
|:----------:|:---------------:|:------------:|:------------:|:------------:|:---------------:|:-------------:|:-----:|
| 4.6665     | 2.6526          | 19.7876      | 6.6344       | 16.7880      | 16.8459         | 18.92         | 0     |


### Framework versions

- Transformers 4.19.2
- TensorFlow 2.8.0
- Datasets 2.2.2
- Tokenizers 0.12.1